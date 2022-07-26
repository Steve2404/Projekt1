import cv2

#module de detection et de lecture de qrcode
d = cv2.QRCodeDetector

#recuperation des donnees
val, points, qrcode = d.detectAndDecode(cv2.imread("qrcode.png"))