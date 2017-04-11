# Cloudflare Cache #

This Quicksilver script will purge the Cloudflare cache when your live environment's cache is cleared from the Pantheon dashboard or the WP Admin

## Instructions ##

- Copy `cloudflare_cache.json` to `files/private` of the *live* environment and update it with the cloudflare info.
 - API key can be found in the `My Settings` page on Cloudflare. (DO NOT reset the API key)
 - Zone ID can be found the `Overview` page of the Cloudflare site dashboard
- Add the `cloudflare_cache.php` script to the `private/scripts` directory of your code repository.
- Add a Quicksilver operation to your `pantheon.yml` to fire the script after a deploy.
  - More info on `pantheon.yml` found [here](https://pantheon.io/docs/pantheon-yml/)
- Deploy through to the live environment and clear the cache!

### Example `pantheon.yml` ###

Here's an example of what your `pantheon.yml` would look like if this were the only Quicksilver operation you wanted to use:

```yaml
api_version: 1
php_version: 7.0

workflows:
  clear_cache:
    after:
      - type: webphp
        description: Cloudflare Cache
        script: private/scripts/cloudflare_cache.php
```