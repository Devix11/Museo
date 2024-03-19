module.exports = {
    '**/*.php': ['php ./vendor/bin/php-cs-fixer fix --path /web --config .php_cs --allow-risky=yes'],
};