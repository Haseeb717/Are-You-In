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
		postData = "user_id=" + user + "&text=" + text + "&parent=" + parent + "&re";
		postData = "user_id=USER&text=TEXT&parent=PARENT&reply_to=REPLY&page=PAGE".replace("USER", user)
					.replace("TEXT", text).replace("PARENT", parent).replace("REPLY", reply)
					.replace("PAGE", page);

		$.ajax({
			type: "POST",
			url: "/teams/" + team + "/message",
			dataType: "JSON",
			data: postData,
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

	$(document).on("click", ".reload-team-feeds", function(event) {
		event.preventDefault();
		team = $("#team_id").val();

		// team id required for update
		if (team == undefined || team == null)
			return;

		$.ajax({
			type: "GET",
			url: "/teams/" + team + "/team_feeds",
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
	});

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