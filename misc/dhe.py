import sys

def compute_dhe(modulo, base, secret): 
    return pow(base, secret) % modulo

if __name__ == "__main__":
    if len(sys.argv) == 4:
        modulo = int(sys.argv[1])
        base = int(sys.argv[2])
        secret = int(sys.argv[3])
        result = compute_dhe(modulo, base, secret)
        print("Result: " + str(result))
    else:
        print("Usage: python3 dhe.py <modulo> <base> <secret>")

