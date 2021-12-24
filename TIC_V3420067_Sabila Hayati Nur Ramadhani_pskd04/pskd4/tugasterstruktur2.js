class Affine {
    static a = 7;
    static b = 10;
    static
    encryptMessage(msg) {
        let cipher = "";
        for (let i = 0; i < msg.length; i++) {
            if (msg[i] != ' ') {
                cipher = cipher + String.fromCharCode(((((Affine.a * (msg[i].charCodeAt(0) - 'A'.charCodeAt(0))) + Affine.b) % 26) + 'A'.charCodeAt(0)));
            } else {
                cipher += msg[i];
            }
        }
        return cipher;
    }
    static
    decryptCipher(cipher) {
            let msg = "";
            let a_inv = 0;
            let flag = 0;

            for (let i = 0; i < 26; i++) {
                flag = (Affine.a * i) % 26;
                if (flag == 1) {
                    a_inv = i;
                }
            }
            for (let i = 0; i < cipher.length; i++) {
                if (cipher.charAt(i) != ' ') {
                    msg = msg + String.fromCharCode((((a_inv * ((cipher.charAt(i).charCodeAt(0) + 'A'.charCodeAt(0) - Affine.b)) % 26)) + 'A'.charCodeAt(0)));
                } else {
                    msg += cipher.charAt(i);
                }
            }
            return msg;
        }
        // Driver code
    static
    main(args) {
        let msg = "SABILA";
        // Calling encryption function
        let cipherText = Affine.encryptMessage(msg.split(''));
        console.log("Hasil Enkripsi Affine = " + cipherText);
        // Calling Decryption function
        console.log("Hasil Deskripsi Affine : " + Affine.decryptCipher(cipherText));
    }
}
Affine.main([]);