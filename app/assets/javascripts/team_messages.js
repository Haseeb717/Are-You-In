$(document).ready(function() {

	// user comment handler (simple message)
	$(document).on("keypress", "#user-text", function(event) {
		// confirming if enter is pressed
		if (event.which == 13) {
			team = $("#team_id").val();
			user = $("#user_id").val();
			text = $(this).val().trim("");
			parent = "";
			reply = "";
			page = "";

			// confirming complete message
			if (team == undefined || team == null || user == undefined ||
					user == null || text == undefined || text == null || text == "")
				return;

			$(this).attr("disabled", "disabled");
			submitTeamMessage(team, user, text, parent, reply, page);
		}
	});

	// on click on camera at right to message box
	$(document).on("click", ".input-group-addon", function(event) {
		team = $("#team_id").val();
		user = $("#user_id").val();
		text = $(this).siblings("#user-text").val().trim("");
		parent = "";
		reply = "";
		page = "";

		// confirming complete message
		if (team == undefined || team == null || user == undefined ||
				user == null || text == undefined || text == null || text == "")
			return;

		$(this).siblings("#user-text").attr("disabled", "disabled");
		submitTeamMessage(team, user, text, parent, reply, page);
	});

	// user reply to specific message handler
	$(document).on("click", ".btn-reply", function(event) {
		team = $(this).siblings(".team").val();
		user = $("#user_id").val();
		text = $(this).siblings("textarea").val().trim("");
		parent = $(this).siblings(".parent-message").val();
		reply = $(this).siblings(".reply-user").val();
		page = (window.location.href.indexOf("dashboard") > 0) ? "dashboard" : "";

		// confirming complete reply message
		if (team == undefined || team == null || user == undefined ||
				user == null || text == undefined || text == null || text == "" ||
				parent == undefined || parent == null || parent == "" ||
				reply == undefined || reply == null || reply == "")
			return;

		$(this).attr("disabled", "disabled");
		submitTeamMessage(team, user, text, parent, reply, page);
	});

	// user reply all handler
	$(document).on("click", ".btn-reply-all", function(event) {
		team = $(this).siblings(".team").val();
		user = $("#user_id").val();
		text = $(this).siblings("textarea").val().trim("");
		parent = $(this).siblings(".parent-message").val();
		reply = "";
		page = (window.location.href.indexOf("dashboard") > 0) ? "dashboard" : "";

		// confirming complete reply message
		if (team == undefined || team == null || user == undefined ||
				user == null || text == undefined || text == null || text == "" ||
				parent == undefined || parent == null || parent == "")
			return;

		$(this).attr("disabled", "disabled");
		submitTeamMessage(team, user, text, parent, reply, page);
	});

	function submitTeamMessage(team, user, text, parent, reply, page) {
		team_filter = $(".team-filter").val();
		allow_message = true;
		// if there is team filter then get its feeds only
		if (page == "dashboard" && team_filter != null && team_filter != "") {
			page = "";
			allow_message = false;
		}

		$.ajax({
			type: "POST",
			url: "/teams/" + team + "/message",
			dataType: "JSON",
			data: {
				user_id: user,
				text: text,
				parent: parent,
				reply_to: reply,
				page: page
			},
			success: function (data) {
				// console.log(data);
				$(".team-feed-widget").html(data.design);
				shortifyFeedText();

				// if there is team filter then get its feeds only
				if (!allow_message) $(".com-post").remove();

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}

	// reloading teams feed on right panel
	$(document).on("click", ".reload-team-feeds", function(event) {
		event.preventDefault();
		team = $("#team_id").val();
		user = $("#user_id").val();
		dashboard = window.location.href.indexOf("dashboard") > 0;
		team_filter = $(".team-filter").val();

		// checking for team page or dashboard
		if (team != undefined && team != null)
			update_team_feeds(team, true);
		else if (dashboard && team_filter != undefined && team_filter != "")
			update_team_feeds(team_filter, false);
		else if (dashboard && user != undefined && user != null)
			update_user_team_feeds(user);
	});
	// update feeds on team page
	function update_team_feeds(team, allow_message) {
		$.ajax({
			type: "GET",
			url: "/teams/" + team + "/team_feeds",
			dataType: "JSON",
			success: function (data) {
				// console.log(data);
				$(".team-feed-widget").html(data.design);
				if (!allow_message) $(".com-post").remove();
				shortifyFeedText();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}
	// update feeds on dashboard
	function update_user_team_feeds(user) {
		$.ajax({
			type: "GET",
			url: "/users/" + user + "/team_feeds",
			dataType: "JSON",
			success: function (data) {
				// console.log(data);
				$(".team-feed-widget").html(data.design);
				shortifyFeedText();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}

	// toggle messaging div on team page
	$(document).on("click", ".reply-trigger", function(event) {
		$(this).closest(".feed-function").find(".reply-all-wrap").slideUp("fast");
		$(this).closest(".feed-function").find(".reply-wrap").slideToggle("fast");
		return false;
	});
	$(document).on("click", ".reply-all-trigger", function(event) {
		$(this).closest(".feed-function").find(".reply-wrap").slideUp("fast");
		$(this).closest(".feed-function").find(".reply-all-wrap").slideToggle("fast");
		return false;
	});


	// shorten text, and show "more" button .. used on team message system
	shortifyFeedText();
	function shortifyFeedText() {
		$(".text-description").shorten({
			"showChars" : 160,
			"moreText"  : "See More",
			"lessText"  : "Less",
		});
	}
});