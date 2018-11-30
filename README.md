# ApprovedRevs Slack bridge
Bridge sending slack-messages (using [SlackNotifications](https://www.mediawiki.org/wiki/Extension:SlackNotifications)) when a new revision to an approved page (using [ApprovedRevse](https://www.mediawiki.org/wiki/Extension:Approved_Revs)) is submitted and needs to be reviewed

# Installation
* Clone this repository into a folder called `ApprovedRevsSlackBridge` inside your `/extensions`-folder of your MediaWiki root-folder
* Add `wfLoadExtension( 'ApprovedRevsSlackBridge' );` to the `/LocalSettings.php`-file
