BBM-gmt-to-local
================

Expression Engine Plug-in to take GMT time and convert it to a local timezone.

Particularly useful if you want to use the {gmt_entry_date format="%Y %m %d"} tag to force entry dates to always be displayed in a specific timezone and format. For example:  

{exp:bbm_gmt_to_local gmt='{gmt_entry_date format="%D, %d %M %Y %H:%i:%s %O"}' tz='America/Los Angeles' format='g:i A, M. jS, Y'}

Parameters
==================================

- gmt 	: Start date in GMT
		: Default to current time if not supplied
		: Format: "Thu, 06 Sep 2012 18:55:25 +0000"

- ltz 	: Local timezone you want to convert into
		: Default is: "America/New_York"
		: See http://php.net/manual/en/timezones.others.php

- format 	: Date time format
			: Use PHP formats. http://www.php.net/manual/en/datetime.formats.date.php


Tag
==================================
{exp:bbm_gmt_to_local gmt=gmt='Thu, 06 Sep 2012 18:55:25 +0000'}
Return
==================================
Returns the converted time in the format requested

Example
===========================
{exp:bbm_gmt_to_local gmt='Thu, 06 Sep 2012 18:55:25 +0000' tz='America/Los_Angeles' format='F jS, Y, g:ia T'}

Changelog
===========================

Version 1.0
---------------------------

- Initial release