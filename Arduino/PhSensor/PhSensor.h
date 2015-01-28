#ifndef Sensor_h
#define Sensor_h

#include "Arduino.h"

class PhSensor
{
  public:
    PhSensor(int pin);
    float read(float temp);
  private:
    int _pin;
};

#endif
