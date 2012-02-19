# Require
require 'net/ssh'
require 'net/sftp'
require 'rgbapng'

# Config
css_dir			= "css"
sass_dir		= "sass"
images_dir		= "img"
javascripts_dir	= "js"

remote_theme_dir_absolute = '/path/to/website.tld/wp-content/themes/themename'

# Development
output_style	= :expanded
line_comments	= true

# Production
# line_comments	= false
# output_style	= :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# Connection Details
sftp_host = 'website.tld'
sftp_user = 'username'

# Upload
on_stylesheet_saved do |filename|
	$local_path_to_css_file = css_dir + '/' + File.basename(filename)
	
	Net::SFTP.start( sftp_host, sftp_user ) do |sftp|
		sftp.upload! $local_path_to_css_file, remote_theme_dir_absolute + '/' + css_dir + '/' + File.basename(filename)
	end
	puts ">>> File uploaded."
end