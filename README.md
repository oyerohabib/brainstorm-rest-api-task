# Brainstorm Authorized Rest Api Task (PHP)
## This is a simple Rest Api project that simplies gets the Capsules data from the spacex website and returns it.

## Steps to running this project
- Ensure you are inside the project folder after you must have cloned it.
- For a MacOS user, ensure you have brew installed and then install PHP using brew with the command, `brew install php`
- Then, run the command `php -S localhost:8000 -t .` or `composer start`
- Then, open your browser on the port, `localhost:8000/api/capsules` to get all capsules or `localhost:8000/api/capsules/${capsule_serial}` to get the particular capsule data.