require('./bootstrap');
require('alpinejs');

(function() {
  'use strict';

  /**
   * Initialize a Timesheet
   */
  var Timesheet = function(container, min, max, data) {
    this.data = [];
    this.year = {
      min: min,
      max: max
    };

    this.parse(data || []);

    if (typeof document !== 'undefined') {
      this.container = (typeof container === 'string') ? document.querySelector('#'+container) : container;
      this.drawSections();
      this.insertData();
    }
  };

  /**
   * Insert data into Timesheet
   */
  Timesheet.prototype.insertData = function() {
    var html = [];
    var widthMonth = this.container.querySelector('.scale section').offsetWidth;

    for (var n = 0, m = this.data.length; n < m; n++) {
      var cur = this.data[n];
      var bubble = this.createBubble(widthMonth, this.year.min, cur.start, cur.end);

      var line = [
        '<span style="margin-left: ' + bubble.getStartOffset() + 'px; width: ' + bubble.getWidth() + 'px;" class="bubble bubble-' + (cur.type || 'default') + '" data-duration="' + (cur.end ? Math.round((cur.end-cur.start)/1000/60/60/24/39) : '') + '"></span>',
        '<span class="date">' + bubble.getDateLabel() + '</span> ',
        '<span class="label">' + cur.label + '</span>'
      ].join('');

      html.push('<li>' + line + '</li>');
    }

    this.container.innerHTML += '<ul class="data">' + html.join('') + '</ul>';
  };

  /**
   * Draw section labels
   */
  Timesheet.prototype.drawSections = function() {
    var html = [];

    for (var c = this.year.min; c <= this.year.max; c++) {
      html.push('<section>' + c + '</section>');
    }

    this.container.className = 'timesheet color-scheme-default';
    this.container.innerHTML = '<div class="scale">' + html.join('') + '</div>';
  };

  /**
   * Parse data string
   */
  Timesheet.prototype.parseDate = function(date) {
    if (date.indexOf('/') === -1) {
      date = new Date(parseInt(date, 10), 0, 1);
      date.hasMonth = false;
    } else {
      date = date.split('/');
      date = new Date(parseInt(date[1], 10), parseInt(date[0], 10)-1, 1);
      date.hasMonth = true;
    }

    return date;
  };

  /**
   * Parse passed data
   */
  Timesheet.prototype.parse = function(data) {
    for (var n = 0, m = data.length; n<m; n++) {
      var beg = this.parseDate(data[n][0]);
      var end = data[n].length === 4 ? this.parseDate(data[n][1]) : null;
      var lbl = data[n].length === 4 ? data[n][2] : data[n][1];
      var cat = data[n].length === 4 ? data[n][3] : data[n].length === 3 ? data[n][2] : 'default';

      if (beg.getFullYear() < this.year.min) {
        this.year.min = beg.getFullYear();
      }

      if (end && end.getFullYear() > this.year.max) {
        this.year.max = end.getFullYear();
      } else if (beg.getFullYear() > this.year.max) {
        this.year.max = beg.getFullYear();
      }

      this.data.push({start: beg, end: end, label: lbl, type: cat});
    }
  };

  /**
   * Wrapper for adding bubbles
   */
  Timesheet.prototype.createBubble = function(wMonth, min, start, end) {
    return new Bubble(wMonth, min, start, end);
  };

  /**
   * Timesheet Bubble
   */
  var Bubble = function(wMonth, min, start, end) {
    this.min = min;
    this.start = start;
    this.end = end;
    this.widthMonth = wMonth;
  };

  /**
   * Format month number
   */
  Bubble.prototype.formatMonth = function(num) {
    num = parseInt(num, 10);

    return num >= 10 ? num : '0' + num;
  };

  /**
   * Calculate starting offset for bubble
   */
  Bubble.prototype.getStartOffset = function() {
    return (this.widthMonth/12) * (12 * (this.start.getFullYear() - this.min) + this.start.getMonth());
  };

  /**
   * Get count of full years from start to end
   */
  Bubble.prototype.getFullYears = function() {
    return ((this.end && this.end.getFullYear()) || this.start.getFullYear()) - this.start.getFullYear();
  };

  /**
   * Get count of all months in Timesheet Bubble
   */
  Bubble.prototype.getMonths = function() {
    var fullYears = this.getFullYears();
    var months = 0;

    if (!this.end) {
      months += !this.start.hasMonth ? 12 : 1;
    } else {
      if (!this.end.hasMonth) {
        months += 12 - (this.start.hasMonth ? this.start.getMonth() : 0);
        months += 12 * (fullYears-1 > 0 ? fullYears-1 : 0);
      } else {
        months += this.end.getMonth() + 1;
        months += 12 - (this.start.hasMonth ? this.start.getMonth() : 0);
        months += 12 * (fullYears-1);
      }
    }

    return months;
  };

  /**
   * Get bubble's width in pixel
   */
  Bubble.prototype.getWidth = function() {
    return (this.widthMonth/12) * this.getMonths();
  };

  /**
   * Get the bubble's label
   */
  Bubble.prototype.getDateLabel = function() {
    return [
      (this.start.hasMonth ? this.formatMonth(this.start.getMonth() + 1) + '/' : '' ) + this.start.getFullYear(),
      (this.end ? '-' + ((this.end.hasMonth ? this.formatMonth(this.end.getMonth() + 1) + '/' : '' ) + this.end.getFullYear()) : '')
    ].join('');
  };

  window.Timesheet = Timesheet;
})();

document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById('map') !== null) {
        initMap();
    }

    if (document.getElementById('timesheet') !== null) {
        initTimesheet();
    }
});

class Polygon {
  constructor(points, name, id) {
    this.points = points;
    this.name = name;
    this.id = id;
  }
}

function initMap()
{
    var mymap = L.map('map').setView([51.967149, 7.596715], 17);

    L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        //id: 'mapbox/streets-v11',
        //tileSize: 512,
        //zoomOffset: -1
        //accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

    var points = [[
      51.96722951733728,
      7.596622109413146
      
    ],
    [
      51.967204729209804,
      7.596631497144699
      
    ],
    [
      51.967178288525375,
      7.596652954816817
    ],
    [
      51.96715515291374,
      7.596665024757384
    ],
    [
      51.96712458083717,
      7.5966838002204895
    ],
    [
      51.967100618924725,
      7.596705257892608
    ],
    [
      51.96706591544261,
      7.5967347621917725
    ],
    [
      51.96710970792752,
      7.596886307001114
    ],
    [
      51.96714110628655,
      7.59686753153801
    ],
    [
      51.967174983438746,
      7.596851438283919
    ],
    [
      51.96719977158266,
      7.596835345029831
    ],
    [
      51.96723530123172,
      7.596823275089264
    ],
    [
      51.96726008934227,
      7.5967951118946075
    ],
    [
      51.96724604274795,
      7.596697211265564
    ],
    [
      51.96722951733728,
      7.596622109413146
    ]];

    var p1  = new Polygon(points, "Gebiet 1", 2);

    var polygon = L.polygon([
    
    ]).addTo(mymap);

    polygon.bindPopup("<h1>Gebiet eins</h1>An der Umfrage teilnehmen", 1);

    var polygons = [p1];

    polygons.forEach(p => {
      var polygon = L.polygon(
        p.points
      ).addTo(mymap);
      polygon.on('click', function () {
        preview("Umfrage für Polygon " + p.name + ":")
      });
    });
}

function initTimesheet()
{
    new Timesheet('timesheet', 2021, 2023, [
        ['04/2021', 'Kick-Off Event', 'lorem'],
        ['05/2021', '07/2021', 'Software Development Phase', 'ipsum'],
    ]);
}
