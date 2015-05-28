#ifndef WaterTemperature_h
#define WaterTemperature_h

#include "Arduino.h"
#include "OneWire.h"
#include "DallasTemperature.h"

#define ONE_WIRE_BUS 2

class WaterTemperature{
  public:
    WaterTemperature(int pin);
    ~WaterTemperature();
    float readWaterTemp();
  private:
    int _pin;
    OneWire* oneWire;
    DallasTemperature* sensor;
};

#endif
