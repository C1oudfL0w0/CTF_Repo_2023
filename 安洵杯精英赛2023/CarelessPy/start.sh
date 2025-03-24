#!/bin/sh
sh /flag.sh
python -m py_compile /app/part.py
python /app/app.py
rm -f /start.sh
