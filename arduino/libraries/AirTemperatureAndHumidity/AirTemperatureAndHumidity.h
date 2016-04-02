#ifndef AirTemperatureAndHumidity_h
#define AirTemperatureAndHumidity_h

#include "Arduino.h"
#include "DHT.h"

class AirTemperatureAndHumidity{
  public:
    AirTemperatureAndHumidity(int pin, int type);
    ~AirTemperatureAndHumidity();
    float readHumidity();
    float readAirTemp();
  private:
    DHT* sensor;
};

#endif
