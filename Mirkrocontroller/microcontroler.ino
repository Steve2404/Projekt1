#include <WiFi.h>
//#include <ArduinoJson.h>
#include <ArduinoJson.h>
 
const char* ssid = "Norton-S";
const char* password = "Elektronik4815162342";
const char* host =  "mypaket.org";  //webhost url
const char* host2 = "maker.ifttt.com";
const char* apiKey = "dvBTBLLjFN5pgu_-QFI6pf";
const String notifString = "🚍";


//pin output
const int tuer = 27;
const int camera = 26;
const int wifi = 23;
int count = 0;
String url;

void setup() {
  Serial.begin(115200);
  delay(100);
  pinMode(tuer, OUTPUT);
  pinMode(camera, OUTPUT);
  pinMode(wifi, OUTPUT);
  digitalWrite(tuer, 0);
  digitalWrite(camera, 0);
  digitalWrite(wifi, 0);
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password); 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    digitalWrite(wifi, 1);
    delay(500);
    digitalWrite(wifi, 0);
    delay(500);
  }
 
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.print("Netmask: ");
  Serial.println(WiFi.subnetMask());
  Serial.print("Gateway: ");
  Serial.println(WiFi.gatewayIP());
  digitalWrite(wifi, 1);
  delay(500);
  digitalWrite(wifi, 0);
  delay(500);
}
 
 void loop() {

  digitalWrite(wifi, 1);
  Serial.print("connecting to ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, 80)) {
    Serial.println("connection failed");
    return;
  }

  url = "/API/read_all.php?username=Leonel";//"/API/read_all.php?username=Leonel";
  Serial.println("Get user data");
  Serial.print("Requesting URL: ");
  Serial.println(url);
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "User-Agent: NodeMCU\r\n"+
               "Connection: close\r\n\r\n");
  delay(500);
  String section="header";
  while(client.available()){
    String line = client.readStringUntil('\r');
    //Serial.print(line);
    // we’ll parse the HTML body here
    if (section=="header") { // headers..
     
      if (line=="\n") { // skips the empty space at the beginning 
        section="json";
      }
    }
    else if (section=="json") {  // print the good stuff
      section="ignore";
      String result = line.substring(1);
      

      DynamicJsonDocument doc(512);
      String line1 = client.readString(); //PAYLOAD
      deserializeJson(doc, line1);
      JsonObject obj = doc.as<JsonObject>();
      int state_tuer = obj[String("state_tuer")];
      int state_camera = obj[String("state_camera")];
      int notif = obj[String("notification")];
      
      //Send email
      if(notif == 1 && count != 3){
        Serial.print("connecting to ");
        Serial.println(host2);
        WiFiClient client2;
        if (!client2.connect(host2, httpPort)) {
          Serial.println("connection to email service failed");
          return;
        }
        digitalWrite(wifi, 1);
        delay(300);
        count += 1;
        String url2 = "/trigger/notification/with/key/";
        url2 += apiKey;

        Serial.print("Requesting URL: ");
        Serial.println(url2);
        client2.print(String("POST ") + url2 + " HTTP/1.1\r\n" +
                      "Host: " + host2 + "\r\n" + 
                      "Content-Type: application/x-www-form-urlencoded\r\n" + 
                      "Content-Length: 13\r\n\r\n" +
                      "value1=" + notifString + "\r\n");
        
        digitalWrite(wifi, 0);
        delay(300);
        if(count == 3){
          Serial.println("we have sent 3 notifications");
          return;
        }
      }
      if(notif == 0){
        count = 0;
      }
      Serial.print("state_tuer: ");
      Serial.println(state_tuer);
      Serial.print("state_camera: ");
      Serial.println(state_camera);
  
    
      digitalWrite(tuer, state_tuer);
      delay(200);
      Serial.println("tuer state is changing!");
      digitalWrite(camera, state_camera);
      delay(200);
      Serial.println("camera state is changing!");
      
      
    }
  }
  Serial.println();
  Serial.println("closing connection");
  delay(3000);
}
