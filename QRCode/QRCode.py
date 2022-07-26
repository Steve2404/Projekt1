import qrcode   #import de base
from qrcode.constants import  ERROR_CORRECT_L

#de base
''' img = qrcode.make("http://youtube.com")
img.save('qrcode.png') '''

# creer une variable
qr = qrcode.QRCode(
    version=3,
    error_correction = ERROR_CORRECT_L,
    box_size=5,
    border=3,
)
# definir une adresse de redirection
qr.add_data('https://mypaket.org/Home2/postier.php')

#parametrage
qr.make(fit=True)
img = qr.make_image(fill_color="white", back_color="black")
img.save('qrcode2.png')