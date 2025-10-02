const config = {
    "**/*.php": [
        "php ./vendor/bin/rector --dry-run --ansi",
        "php ./vendor/bin/pint --parallel --test --ansi",
        "php ./vendor/bin/phpstan analyse --memory-limit=2G --ansi",
        "php ./vendor/bin/pest --colors=always --coverage --parallel"
    ],
};

export default config;
