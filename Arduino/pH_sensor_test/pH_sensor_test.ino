int data [1];
char names [1]= {'p'};
int ph;

void setup(){
  Serial.begin(9600);
  Serial.end();
}

float get_ph(int number, int temp){
  return 7 - (2.5 - analogRead(number)/200) / (0.257179 + 0.000941468 * temp);
}

void send_data(int dataForSend[], char sensorNames[],int size) 
{
  String sendString = "";
  for(int i=0;i < size;i++){
   sendString = sendString + dataForSend[i] +sensorNames[i] +"\n";
  }
  Serial.print(sendString);
  
  //format of the string to be sent is a character to identify each sensor, followed by
  // the data in the form of the isnteger, followed by a new line character
   
}

void loop(){
  ph = int(get_ph(0,20)*100);
  data[0] = ph;
  send_data(data, names,1);
  //Serial.print(ph);
  delay(4000);
}


