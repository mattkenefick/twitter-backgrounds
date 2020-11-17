
# Random Twitter Background

The purpose of this example is to add a random new banner to your account
kind of like Bing images desktop. We can generate from a folder, from Bing,
or from Unsplash.

If you'd like this to run automatically, you could add the script to a crontab.
Here's an example of running it daily at 8am.

    0 8 * * * php index.php


## Install Dependencies

Require `dotenv` and `twitteroauth` dependencies with composer:

    composer install


## Twitter Setup

Create an application on Twitter by going to:

    https://developer.twitter.com/en/apps


Generate a READ/WRITE token from the "Keys and Tokens" tab. Take those
four values and put them in an `.env` file as per the example in `.env.example`


## Add Images

Add the images you want to randomize into the `image/` folder.

If you'd prefer to use an automatic image from Unsplash, go into your
`.env` file and change `IMAGE_SOURCE` to "unsplash". You can set comma delimited
search parameters using `UNSPLASH_TERMS`, like: "city,night"


## Run Script

You should have PHP installed on your machine with fairly basic capabilities.

    php index.php


## Check Twitter

You should immediately see a new banner.
