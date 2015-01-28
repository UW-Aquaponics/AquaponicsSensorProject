#ifndef WaterTemperature_h
#define WaterTemperature_h

#include "Arduino.h"
#include "OneWire.h"
#include "DallasTemperature.h"

#define ONE_WIRE_BUS 2

class WaterTemperature{
  public:
    WaterTemperature();
    ~WaterTemperature();
    float readWaterTemp();
  private:
    int _pin;
};

#endif
