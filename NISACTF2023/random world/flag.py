import random
flag = '***********************************'
random.seed(1)
l = []
for i in range(7):
    l.append(random.getrandbits(8))
result=[]
for i in range(len(l)):
    random.seed(l[i])
    for n in range(5):
        result.append(ord(flag[i*5+n])^random.getrandbits(8))
        print(i*5+n)
print(result)
# result = [225, 55, 244, 96, 172, 137, 164, 162, 15, 134, 182, 80, 251, 91, 218, 48, 15, 209, 124, 214, 234, 4, 100, 193, 3, 49, 39, 44, 120, 90, 90, 59, 120, 231, 165]