#include "Arduino.h"
#include "SoftwareSerial.h"
#include "DissolvedOxygen.h"

DissolvedOxygen::DissolvedOxygen(int rxPin, int txPin) {
  doSerial = new SoftwareSerial(rxPin, txPin);
  doSerial->begin(9600);
  doSerial->print("RESPONSE,0\r");
  doSerial->flush();
  doSerial->print("C,0\r");
  receivedFromSensor = 0;
  stringReceived = false;
  doFloat = 0;
}

float DissolvedOxygen::readDissolvedOxygen() {
  doSerial->print("R\r");

  receivedFromSensor = doSerial->readBytesUntil(13, doData, 20);
  doData[receivedFromSensor] = 0;

  dissolvedOxygen = strtok(doData, ",");
  doFloat = atoi(dissolvedOxygen);

  return doFloat;
}

float DissolvedOxygen::readDissolvedOxygen(float temp) {
  long longTemp = temp;
  String tempString = String(longTemp);
  doSerial->print("T," + tempString + "\r");
  doSerial->print("R\r");

  receivedFromSensor = doSerial->readBytesUntil(13, doData, 20);
  doData[receivedFromSensor] = 0;

  dissolvedOxygen = strtok(doData, ",");
  doFloat = atoi(dissolvedOxygen);

  return doFloat;
}
