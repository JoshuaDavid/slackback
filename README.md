# slackback
Save slack messages

Gives a minimal interface for working with the [Slack Outgoing Webhooks Interface](https://api.slack.com/outgoing-webhooks).

## Installation and Setup

1. Ensure that you have a server with PHP >= 5.4 and the `php5-sqlite` module installed
2. Dump this directory in a web-facing directory on a server  
    `cd /var/www/html`  
    `git clone https://github.com/JoshuaDavid/slackback.git`
3. Make the db directory writeable by the script  
    `chmod a+rw db`
4. Run init.php  
    `php init.php`  
    or  
    navigate to `http://your.server.com/path/to/slackback/init.php`
5. Set up webhook integration by going to
    [https://my.slack.com/services/new/outgoing-webhook](https://my.slack.com/services/new/outgoing-webhook)
    and then clicking the `Add Outgoing WebHooks Integration` button.
6. In the `URL(s)` textarea, put `http://your.server.com/path/to/slackback/dump.php`
7. Click the `Save Settings` button
