#include <ESP8266WiFi.h>
#include <Servo.h>

const char* ssid = "Hello";
const char* password = "88888888";

const int ldrPin = A0;
const int servoPin = D1;

Servo servo;

void setup() {
  Serial.begin(9600);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi!");

  servo.attach(servoPin);
}

void loop() {
  int ldrValue = analogRead(ldrPin);

  Serial.print("LDR value: ");
  Serial.println(ldrValue);

  if (ldrValue > 100) {
    for (int i = 0; i < 5; i++) {
      servo.write(0);  // Rotate servo to 0 degrees (start position)
      delay(100);  // Delay for servo rotation
      servo.write(5000); // Rotate servo to 180 degrees (end position)
      delay(100);  // Delay for servo rotation
    }
  } else {
    servo.write(0); // Stop servo rotation
  }

  delay(100);
}
