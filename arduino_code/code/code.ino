#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

//-------------------------------------------------------------------
#include <DHT.h>
#define DHT11_PIN D3
#define DHTTYPE DHT11
#define AC_PIN D1  // replace with the GPIO pin you're using to control the relay
#define TV_PIN D2  // replace with the GPIO pin you're using to control the relay
#define FAN_PIN D4  // replace with the GPIO pin you're using to control the relay
#define LED_PIN D5  // replace with the GPIO pin you're using to control the relay

DHT dht(DHT11_PIN, DHTTYPE);
//-------------------------------------------------------------------
//enter WIFI credentials
const char* ssid     = "Hello";
const char* password = "88888888";
//-------------------------------------------------------------------
//enter domain name and path
//http://www.example.com/sensordata.php
const char* SERVER_NAME = "http://192.168.200.244/HCD/sensordata.php";

//PROJECT_API_KEY is the exact duplicate of, PROJECT_API_KEY in config.php file
//Both values must be same
// String PROJECT_API_KEY = "ENTER_PROJECT_API_KEY";
//-------------------------------------------------------------------
//Send an HTTP POST request every 30 seconds
unsigned long lastMillis = 0;
long interval = 500;
//-------------------------------------------------------------------

/*
 * *******************************************************************
 * setup() function
 * *******************************************************************
 */
void setup() {
  
  //-----------------------------------------------------------------
  Serial.begin(115200);
  Serial.println("esp serial initialize");
  //-----------------------------------------------------------------
  dht.begin();
  Serial.println("initialize DHT11");
  //-----------------------------------------------------------------
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  Serial.println("Timer set to 5 seconds (timerDelay variable),");
  Serial.println("it will take 5 seconds before publishing the first reading.");
  //-----------------------------------------------------------------
  pinMode(AC_PIN, OUTPUT);
  digitalWrite(AC_PIN, HIGH);  // turn off the relay on startup
  pinMode(TV_PIN, OUTPUT);
  digitalWrite(TV_PIN, HIGH);  // turn off the relay on startup
    pinMode(FAN_PIN, OUTPUT);
  digitalWrite(FAN_PIN, HIGH);  // turn off the relay on startup
  pinMode(LED_PIN, OUTPUT);
  digitalWrite(LED_PIN, HIGH);  // turn off the relay on startup

}


/*
 * *******************************************************************
 * setup() function
 * *******************************************************************
 */
void loop() {
  
  //-----------------------------------------------------------------
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    if(millis() - lastMillis > interval) {
       //Send an HTTP POST request every interval seconds
       upload_temperature();
       lastMillis = millis();
    }
  }
  //-----------------------------------------------------------------
  else {
    Serial.println("WiFi Disconnected");
  }
  //-----------------------------------------------------------------

  // delay(1000);  
  }


void upload_temperature()
{
  //--------------------------------------------------------------------------------
  //Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  //Read temperature as Celsius (the default)
  float t = dht.readTemperature();
  
  float h = dht.readHumidity();

  if (isnan(h) || isnan(t)) {
    Serial.println(F("Failed to read from DHT sensor!"));
    return;
  }
  
  //Compute heat index in Celsius (isFahreheit = false)
  float hic = dht.computeHeatIndex(t, h, false);
  //--------------------------------------------------------------------------------
  //°C
  String humidity = String(h, 2);
  String temperature = String(t, 2);
  String heat_index = String(hic, 2);

  Serial.println("Temperature: "+temperature);
  Serial.println("Humidity: "+humidity);
  //Serial.println(heat_index);
  Serial.println("--------------------------");
  //--------------------------------------------------------------------------------
  //HTTP POST request data
  String temperature_data;
  // temperature_data = "api_key="+PROJECT_API_KEY;
  temperature_data += "&temperature="+temperature;
  temperature_data += "&humidity="+humidity;

  Serial.print("temperature_data: ");
  Serial.println(temperature_data);
  //--------------------------------------------------------------------------------
  
  WiFiClient client;
  HTTPClient http;

  http.begin(client, SERVER_NAME);
  // Specify content-type header
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  // Send HTTP POST request
  int httpResponseCode = http.POST(temperature_data);
  //--------------------------------------------------------------------------------
  // If you need an HTTP request with a content type: 
  //application/json, use the following:
  //http.addHeader("Content-Type", "application/json");
  //temperature_data = "{\"api_key\":\""+PROJECT_API_KEY+"\",";
  //temperature_data += "\"temperature\":\""+temperature+"\",";
  //temperature_data += "\"humidity\":\""+humidity+"\"";
  //temperature_data += "}";
  //int httpResponseCode = http.POST(temperature_data);
  //--------------------------------------------------------------------------------
  // If you need an HTTP request with a content type: text/plain
  //http.addHeader("Content-Type", "text/plain");
  //int httpResponseCode = http.POST("Hello, World!");
  //--------------------------------------------------------------------------------
  Serial.print("HTTP Response code: ");
  Serial.println(httpResponseCode);
    
  // Free resources
  http.end();


  //controll items code
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http_ac;
    HTTPClient http_tv;
    HTTPClient http_led;
    HTTPClient http_fan;

    //for ac
    http_ac.begin("http://192.168.200.244/HCD/get_ac_status.php"); // replace with your PHP API endpoint
    int httpCode_ac = http_ac.GET();
    if (httpCode_ac > 0) {
      String payload_ac = http_ac.getString();
      Serial.println("AC STATUS : "+payload_ac); // print the data to serial monitor
      if(payload_ac == "0")
      {
        digitalWrite(AC_PIN, HIGH);
      }
      else
      {
        digitalWrite(AC_PIN,LOW);
      }
    }
    http_ac.end();

    //for tv
    http_tv.begin("http://192.168.200.244/HCD/get_tv_status.php"); // replace with your PHP API endpoint
    int httpCode_tv = http_tv.GET();
    if (httpCode_tv > 0) {
      String payload_tv = http_tv.getString();
      Serial.println("TV STATUS : "+payload_tv); // print the data to serial monitor
      if(payload_tv == "0")
      {
        digitalWrite(TV_PIN, HIGH);
      }
      else
      {
        digitalWrite(TV_PIN,LOW);
      }
    }
    http_tv.end();

    // for led
    http_led.begin("http://192.168.200.244/HCD/get_led_status.php"); // replace with your PHP API endpoint
    int httpCode_led = http_led.GET();
    if (httpCode_led > 0) {
      String payload_led = http_led.getString();
      Serial.println("LED STATUS : "+payload_led); // print the data to serial monitor
      if(payload_led == "0")
      {
        digitalWrite(LED_PIN, HIGH);
      }
      else
      {
        digitalWrite(LED_PIN,LOW);
      }
    }
    http_led.end();

    //for fan
    http_fan.begin("http://192.168.200.244/HCD/get_fan_status.php"); // replace with your PHP API endpoint
    int httpCode_fan = http_fan.GET();
    if (httpCode_fan > 0) { 
      String payload_fan = http_fan.getString();
      Serial.println("FAN STATUS : "+payload_fan); // print the data to serial monitor
      if(payload_fan == "0")
      {
        digitalWrite(FAN_PIN, HIGH);
      }
      else
      {
        digitalWrite(FAN_PIN,LOW);
      }
    }
    http_fan.end();

  }
  delay(1000); 

  }
