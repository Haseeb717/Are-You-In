module DeviseHelper

	def devise_error_messages!
		flash_alerts = []

		if !flash.empty?
			flash_alerts.push(flash[:error]) if flash[:error]
			flash_alerts.push(flash[:alert]) if flash[:alert]
			flash_alerts.push(flash[:notice]) if flash[:notice]
		end

		return "" if resource.errors.empty? && flash_alerts.empty?
		errors = resource.errors.empty? ? flash_alerts : resource.errors.full_messages
		messages = errors.map { |msg| content_tag(:li, " #{msg}", :class => "fa fa-caret-right col-lg-12 text-danger") }.join

		html = <<-HTML
		<div id="devise-errors">
			<ul>#{messages}</ul>
		</div>
		HTML

		html.html_safe
	end
end