BBM-gmt-to-local
================

Expression Engine Plug-in to take GMT time and convert it to a local timezone

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