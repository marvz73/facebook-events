<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.facebook.com/mjavascript
 * @since      1.0.0
 *
 * @package    Facebook_Event_Radar
 * @subpackage Facebook_Event_Radar/public/partials
 */
?>

<script type="text/javascript">
	events = {"updates": [
      {
        "eventName": "Live Band",
        "eventBanner": "event-banner-pic.png",
        "eventCategory": "Music",
        "eventLocation": "Tangub City",
        "eventVenue": "Activity Centre",
        "eventStart": "1464062121",
        "eventEnd": "1464062121",
        "created": "1464062121",
      },
      {
        "eventName": "Burger Eating Contest",
        "eventBanner": "event-banner-pic.png",
        "eventCategory": "Cooking",
        "eventLocation": "Tangub City",
        "eventVenue": "Activity Centre",
        "eventStart": "1464062121",
        "eventEnd": "1464062121",
        "created": "1464062121",
      },
      {
        "eventName": "Marvin Aya-ay",
        "eventBanner": "Hip Hop Contest",
        "eventCategory": "Dance, Group",
        "eventLocation": "Tangub City",
        "eventVenue": "Activity Centre",
        "eventStart": "1464062121",
        "eventEnd": "1464062121",
        "created": "1464062121",
      },
      {
        "eventName": "Drag Race Mayors Cup",
        "eventBanner": "event-banner-pic.png",
        "eventCategory": "Racing, Sports, Bikes",
        "eventLocation": "Tangub City",
        "eventVenue": "Activity Centre",
        "eventStart": "1464062121",
        "eventEnd": "1464062121",
        "created": "1464062121",
      },
 
	]}
</script>

<script type="text/babel">

var Eventcards = React.createClass({
    getInitialState: function(){
    	return {data: []};
    },
	// updatesFromServer: function()
	// {
	// 	var dataPost='';
	// 	var reactThis=this;

	// 	// ajaxPostReact('newsFeed.php', dataPost, reactThis, function(data){
		
	// 		// setTimeout(function(){
				
	// 			// reactThis.setState({data: events.updates, isLoading: false});
	// 			// reactThis.setState({data: reactThis.props.data});
	// 				console.log('xx',reactThis.props.data)

	// 		// }, 1000)
		
	// 	// });

	// },
	// componentDidMount: function()
	// {
	// 	this.updatesFromServer();
	// },
    render: function(){
		var reactThis = this;		

		var cover = function(cvr){

			if(typeof cvr != 'undefined'){
				return(
					<img src={cvr.source} />
				);
			}else{
				return(
					<img alt="100%x200" data-src="holder.js/100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2OTc2ZmUzMmEgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTY5NzZmZTMyYSI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" />
				);
			}
		}

		var category = function(cty){
			if(typeof cty != 'undefined'){
				return(cty);
			}else{
				return(
					<span>&nbsp;</span>
				);
			}
		}

		var address = function(addr){
			if(typeof addr != 'undefined'){
				return (addr.name);
			}else{
				return ('');
			}
		}
		
		var updatesEach = this.props.data.map(function(update, index){
	    	return(
				<div className="events-items col-sm-6 col-md-6 col-lg-4">
					<div className="thumbnail">
						<button className="event-full-details btn btn-success">DETAILS & DIRECTION</button>
						<div className="event-image">
							{cover(update.cover)}
						</div>
						<div className="caption">
							<div className="clearfix row no-padding">
								<div className="col-sm-9 ellipsis ">
									<strong className="event-title " title={update.name}>{update.name}</strong>
								</div>
								<div className="col-sm-3">
								<span className="label label-success pull-right" title="Attendees">{update.attending_count}</span>
								</div>
								
							</div>
							<p><small className="event-tags">{category(update.category)}</small></p>
							<p className="event-address ellipsis"><i className="fa fa-map-marker fa-1" aria-hidden="true"></i> {address(update.place)}</p>
							<p className="event-time"><i className="fa fa-clock-o" aria-hidden="true"></i> {update.start_time}</p>
							<div className="event-more-details">
								<hr/>
								<p className="event-time"><i className="fa fa-calendar" aria-hidden="true"></i> Yes</p>
								<p className="event-time"><i className="fa fa-camera" aria-hidden="true"></i> Alright</p>
								<p className="event-time"><i className="fa fa-group" aria-hidden="true"></i> Rock n Roll</p>
							</div>
						</div>
					</div>
				</div>
			)
		}, this);

	    return(
	    	<div id="events-list" className="no-padding clearfix">
	    		{updatesEach}
	    	</div>
	    );
   }
});

var EventFilter = React.createClass({
	getInitialState: function(){
		return {location: '', date: '', distance: ''};	
	},
	componentDidMount: function(){
		const { slider } = this.refs;

		jQuery(slider).bootstrapSlider({
			min: 50000,
			max: 500000
		});
	},
	onLocationChange: function(e){
		e.preventDefault();
		this.setState({location: e.target.value });
	},
	onDateChange: function(e){
		e.preventDefault();
		this.setState({date: e.target.value });
	},
	onDistanceChange: function(e){
		e.preventDefault();
		this.setState({distance: e.target.value });
	},
	updateSubmit: function(e){
		e.preventDefault();
		var reactThis = this;
		this.props.onFilter(reactThis.state);
	},
	render: function(){
		var reactThis = this;
		var CFilter = function(){
			return(
				<form className="clearfix" onSubmit={reactThis.updateSubmit}>
					<div className="col-md-4 form-group">
						<div id="location">
							<label>Location</label>
							<input onChange={reactThis.onLocationChange} value={reactThis.state.location} id="location" type="text" className="form-control" />	
						</div>
					</div>
					<div className="col-md-4">
						<div id="date">
							<label>Date</label>
							<select className="form-control">
								<option>Select</option>
							</select>
						</div>
					</div>
					<div className="col-md-4">
						<div id="range" >
							<label>Distance</label>
							<div>
								<input ref="slider"/>
							</div>
						</div>

					</div>
					<input type="submit" className="hide" name="submit" />
				</form>
			)
		} // EOF CLocation

		var CSort = function(){
			return(
				<h3>Sort: ASC, DESC</h3>
			)
		} // EOF CDate

		return(
			<div id="event-filter" className="row">
				{CFilter()}
			</div>
		);
	}
});

//Event Container
var map;
var EventsContainer=React.createClass({
    getInitialState: function(){
    	return {filter: {action: 'getEvents', location: 'Cebu City', dates: '', distance: ''}, data: [], isLoading: true};
    },
	componentDidMount: function(){		
		//
		// Google Map inint goes here
		//
		const { googleMap } = this.refs;
		this.googleMap(googleMap);
	},
	componentWillUpdate: function(a,b,c){
		var reactThis = this;
		if(b.data.length > 0){
			reactThis.setMarker(reactThis.state.data);
		}
	},
	googleMap: function(googleMap){
		var reactThis = this;
				
		jQuery(googleMap).css({height: jQuery(window).height() + 'px'});

		//Init
		google.maps.event.addDomListener(window, 'load', function(){
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {

					var pos = {
					  lat: position.coords.latitude,
					  lng: position.coords.longitude
					};
					//Init Map
					map = new google.maps.Map(googleMap, {
					  center: {lat: position.coords.latitude, lng: position.coords.longitude},
					  zoom: 13
					});
					map.setCenter(pos);

					//Get Location User Current Name
					reactThis.geoLatLng({lat: position.coords.latitude, lng: position.coords.longitude});

				}, function() {
					alert("Browser doesn't support Geolocation");
				});
			} else {		
				alert("Browser doesn't support Geolocation");
			}
		});

	},
	setMarker: function(events){
		var reactThis = this;
			
			console.log(reactThis.state.data)

		setTimeout(function(){
			for(var i in reactThis.state.data){
				// console.log(reactThis.state.data[i].place.location)
				if(typeof reactThis.state.data[i].place != 'undefined' && typeof reactThis.state.data[i].place.location != 'undefined'){
					var pos = new google.maps.LatLng(reactThis.state.data[i].place.location.latitude, reactThis.state.data[i].place.location.longitude);
					var marker = new google.maps.Marker({
					    position: pos,
					    title:reactThis.state.data[i].name
					});
					marker.setMap(map);
					map.setCenter(pos);
				}
			}
		});
	},
	geoLatLng: function(LatLng){
		var reactThis = this;
		var geocoder = new google.maps.Geocoder;
		geocoder.geocode({'location': LatLng}, function(results, status) {
			if (status === 'OK') {
				if (results[0]) {
					reactThis.setFilter(results[0].address_components[1].short_name, '', '');
				} else {
					reactThis.setFilter('all', '', '');
				}
			} else {
		  		window.alert('Geocoder failed due to: ' + status);
			}
		});
	},
	updatesFromServer: function()
	{
		var reactThis=this;
		var dataPost= reactThis.state.filter;

		ajaxPostReact(_global.ajaxurl, dataPost, reactThis, function(resp){
			var updates = reactThis.state.data;
			var newUpdates = resp.data.concat(updates);
			console.log('Events Response:: ',resp);
			reactThis.setState({data: newUpdates, isLoading: false});
		});

	},
	filter: function(filters){
		var reactThis = this;
		
		reactThis.setState({ filter: {action: 'getEvents', location: filters.location, dates: '', distance: ''}, data: []});		

		setTimeout(function(){
			reactThis.updatesFromServer();	
		}, 200);
	},
	setFilter: function(location, date, distance){
		var reactThis = this;
		reactThis.setState({ filter: {action: 'getEvents', location: location, dates: date, distance: distance}});
		
		setTimeout(function(){
			reactThis.updatesFromServer();	
		}, 200);
	},
    render: function(){
    	var reactThis = this;
	    return(
	    	<div>
				<div className="col-sm-8 col-md-8">
		    		<EventFilter onFilter={reactThis.filter} />
		    		<Eventcards data={reactThis.state.data} />
				</div>
				<div id="googleMap" ref="googleMap" className="col-sm-4 col-md-4"></div>
	    	</div>
	    );
   }
});

<?php if(isset($_SESSION['facebook_session']) && !empty($_SESSION['facebook_session'])): ?>

	// Init App
	ReactDOM.render(
	  <EventsContainer/>,
	  document.getElementById('init')
	);

<?php endif; ?>
</script>


<!-- Container -->
<div class="container-fluid clearfix">
	<div id="events-containerX" class="row">

		<?php 
			if(!isset($_SESSION['facebook_session']) && empty($_SESSION['facebook_session'])):
				echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
			endif;
		?>

		<div id="init"></div>

	</div>
</div>