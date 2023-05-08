# AdLer Bug Report System

This repository contains a simple PHP-based web application that allows users to submit bug reports for the AdLer Engine, Autorentool, or Moodle systems. Users can fill out the form, and the bug report will be sent to a designated Discord channel using a webhook.

## Requirements

- Docker
- Discord server with a webhook URL

## Installation

1. Clone the repository:

```
git clone https://github.com/yourusername/adler-bug-report.git
```

2. Go to the project directory:

```
cd adler-bug-report
```

3. Replace the placeholder webhook URL in the `docker-compose.yml` file with your actual Discord webhook URL:

```
APP_WEBHOOKURL: "PLACE DISCORD WEBHOOK URL HERE!"
```

4. Run the application using Docker Compose:

```
docker-compose up -d
```

The application will be accessible on port 8000 by default. You can change the port by modifying the `docker-compose.yml` file.

## Usage

1. Open your web browser and navigate to `http://localhost:8000`.

2. Fill out the bug report form with the necessary information.

3. Submit the form, and the bug report will be sent to the specified Discord channel.

## Customization

You can easily customize the form fields or add new fields by modifying the `index.html` and `submit_bug_report.php` files.

## License

This project is open-source and available under the MIT License.