#ifndef DissolvedOxygen_h
#define DissolvedOxygen_h

#include "Arduino.h"
#include "SoftwareSerial.h"

class DissolvedOxygen {
  public:
    DissolvedOxygen(int rxPin, int txPin);
    ~DissolvedOxygen();
    float readDissolvedOxygen();
    float readDissolvedOxygen(float temp);

  private:
    SoftwareSerial* doSerial;
    char doData[20];
    byte receivedFromSensor;
    bool stringReceived;
    float doFloat;
    char* dissolvedOxygen;
};
#endif     
