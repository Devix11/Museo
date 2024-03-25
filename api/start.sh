#!/bin/bash

# Nome dello screen
SCREEN_NAME="npm_screen"

# Controlla se lo screen esiste già
if screen -list | grep -q "$SCREEN_NAME"; then
    echo "Terminazione dello screen $SCREEN_NAME esistente..."
    screen -S $SCREEN_NAME -X quit
fi

# Crea uno screen con il nome specificato
screen -dmS $SCREEN_NAME

sleep 1

# Esegue i comandi all'interno dello screen
screen -S $SCREEN_NAME -X stuff "cd /var/www/html/scuola/api && npm i && npm run build && npm run start$(printf \\r)"

echo "Comandi eseguiti nello screen $SCREEN_NAME."
