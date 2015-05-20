#include "Arduino.h"
#include "PhSensor.h"

PhSensor::PhSensor(int pin)
{
  pinMode(pin, OUTPUT);
  _pin = pin;
}

float PhSensor::read(float temp)
{
  float ph_val = 7 - (2.5 - analogRead(_pin) / 200.0) / (0.257179 + 0.000941468 * temp);
  float adjusted_ph = ph_val + .3;
  return ph_val;
}
