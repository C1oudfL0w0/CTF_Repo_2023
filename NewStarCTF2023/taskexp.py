from Crypto.Util.number import *

enc = [0x75553A1E, 0x7B583A03, 0x4D58220C, 0x7B50383D, 0x736B3819]
for i in enc:
    print(long_to_bytes(i ^ 0x12345678).decode()[::-1], end='')
