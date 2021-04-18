#!/usr/bin/env python3

import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522

reader = SimpleMFRC522()


def read_rfid():
        try:
                id, text = reader.read()

        finally:
                GPIO.cleanup()
        return id

if __name__ == '__main__':
    print(read_rfid())