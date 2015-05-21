<script>
	(function (namespace, $) {
		"use strict";

		var DemoCalendar = function () {
			// Create reference to this instance
			var o = this;
			// Initialize app when document is ready
			$(document).ready(function () {
				o.initialize();
			});

		};
		var p = DemoCalendar.prototype;

		// =========================================================================
		// INIT
		// =========================================================================

		p.initialize = function () {
			this._enableEvents();

			this._initEventslist();
			this._initCalendar();
			this._displayDate();
		};

		// =========================================================================
		// EVENTS
		// =========================================================================

		// events
		p._enableEvents = function () {
			var o = this;

			$('#calender-prev').on('click', function (e) {
				o._handleCalendarPrevClick(e);
			});
			$('#calender-next').on('click', function (e) {
				// console.log(e);
				o._handleCalendarNextClick(e);
			});
			$('.nav-tabs li').on('show.bs.tab', function (e) {
				o._handleCalendarMode(e);
			});
		};

		// =========================================================================
		// CONTROLBAR
		// =========================================================================

		p._handleCalendarPrevClick = function (e) {
			$('#calendar').fullCalendar('prev');
			this._displayDate();			
		};
		
		p._handleCalendarNextClick = function (e) {
			$('#calendar').fullCalendar('next');
			this._displayDate();

			// var mode 		= $('#calendar').fullCalendar('getView');
			// var type 		= mode.type;
			// var date 		= $('#calendar').fullCalendar('getDate');
			// var datetime 	= date.format().split('T');
			// var start 		= datetime[0].toString();
		};

		p._handleCalendarMode = function (e) {
			$('#calendar').fullCalendar('changeView', $(e.currentTarget).data('mode'));
		};

		p._displayDate = function () {
			var selectedDate = $('#calendar').fullCalendar('getDate');			
			$('.selected-day').html(moment(selectedDate).format("dddd"));
			$('.selected-date').html(moment(selectedDate).format("DD MMMM YYYY"));
			$('.selected-year').html(moment(selectedDate).format("YYYY"));
		};

		// =========================================================================
		// TASKLIST
		// =========================================================================

		p._initEventslist = function () {
			if (!$.isFunction($.fn.draggable)) {
				return;
			}
			var o = this;

			$('.list-events li ').each(function () {
				// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
				// it doesn't need to have a start or end
				var eventObject = {
					title: $.trim($(this).text()), // use the element's text as the event title
					className: $.trim($(this).data('className'))
				};

				// store the Event Object in the DOM element so we can get to it later
				$(this).data('eventObject', eventObject);

				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 999,
					revert: true, // will cause the event to go back to its
					revertDuration: 0, //  original position after the drag
				});
			});
		};

		function getUrlParameter(sParam)
		{
		    var sPageURL = window.location.search.substring(1);
		    var sURLVariables = sPageURL.split('&');
		    for (var i = 0; i < sURLVariables.length; i++) 
		    {
		        var sParameterName = sURLVariables[i].split('=');
		        if (sParameterName[0] == sParam) 
		        {
		            return sParameterName[1];
		        }
		    }
		}  

		// =========================================================================
		// CALENDAR
		// =========================================================================

		p._initCalendar = function (e) {
			if (!$.isFunction($.fn.fullCalendar)) {
				return;
			}

			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			// var curSource = new Array();

			var curSource = cal_link;			

			$('#calendar').fullCalendar({
				height: cal_height,
				header: false,
				editable: true,
				droppable: true,
				timeFormat: 'HH:mm',
				displayEventEnd: true,
				drop: function (date, allDay) { // this function is called when something is dropped
					// retrieve the dropped element's stored Event Object
					var originalEventObject = $(this).data('eventObject');

					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject);

					// assign it the date that was reported
					copiedEventObject.start = date;
					copiedEventObject.allDay = allDay;
					copiedEventObject.className = originalEventObject.className;
					
					// render the event on the calendar
					// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
					$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

					// is the "remove after drop" checkbox checked?
					if ($('#drop-remove').is(':checked')) {
						// if so, remove the element from the "Draggable Events" list
						$(this).remove();
					}
				},

				events: curSource,
				eventRender: function (event, element) {
					var datetime_start 	= event.start._i.split('T');

					if (event.end_i == '') {
						var datetime_end 	= event.end._i.split('T');
					}
					else {
						var datetime_end 	= datetime_start;
					}

					var date_start 		= datetime_start[0].split(/-/);	
					date_start 			= date_start[2]+'-'+date_start[1]+'-'+date_start[0];

					element.find('#date-title').html(element.find('span.fc-event-title').text());
					element.attr('data-toggle', 'modal');
					element.attr('data-target', '#scheduleCreate');
					element.attr('data-id', event.id);
					element.attr('data-title', event.title);
					element.attr('data-date', date_start);
					element.attr('data-status', event.status);
					element.attr('data-start', datetime_start[1]);
					element.attr('data-end', datetime_end[1]);				
					element.attr('data-delete-action', event.del_action);
					element.find('.fc-title').append('<br>');
				},
				eventAfterRender: function(event, $el, view ) {
					var datetime_start 	= event.start._i.split('T');

					if (event.end_i == '') {
						var datetime_end 	= event.end._i.split('T');
				        var formattedTime 	= $.fullCalendar.formatRange(event.start, "HH:mm { - HH:mm}");
					}
					else {
						var datetime_end 	= datetime_start;
						var formattedTime 	= $.fullCalendar.formatRange(event.start, event.end, "HH:mm { - HH:mm}");
					}					

			        // If FullCalendar has removed the title div, then add the title to the time div like FullCalendar would do
			        if($el.find(".fc-event-title").length === 0) {
			            $el.find(".fc-event-time").text(formattedTime + " - " + event.title);
			        }
			        else {
			            $el.find(".fc-event-time").text(formattedTime);
			        }
			    },
				// eventClick: function(calEvent, jsEvent, view) {

				//         // alert('Event: ' + calEvent.title);			        

				//         // console.log(calEvent);
				//         // console.log(jsEvent);
				//         // console.log(view);

				//         $('')

				//         // change the border color just for fun
				//         // $(this).css('border-color', 'red');

			 //    },
				// dayClick: function(date, jsEvent, view) {
			 //        // change the day's background color just for fun
			 //        $(this).css('background-color', 'rgba(33, 150, 243, 0.07)');
			 //        $('.fc-day').not($(this)).css('background-color', 'white');
			 //        console.log(date);

			 //    }			    
			});
		};

		// =========================================================================
		namespace.DemoCalendar = new DemoCalendar;
	}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

</script>