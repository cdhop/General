import sys

def build_distribution(modulo, base):
    distribution = dict()

    for index in range(1, modulo):
        result = pow(base, index) % modulo
        if result in distribution.keys():
            distribution[result] = distribution[result] + 1
        else:
            distribution[result] = 1

    return distribution

if __name__ == "__main__":
    if len(sys.argv) == 3:
        modulo = int(sys.argv[1])
        base = int(sys.argv[2])
        distribution = build_distribution(modulo, base)
        for element in distribution:
            print(str(element) + ": " + str(distribution[element]))
        print("Elements: " + str(len(distribution)))
    else:
        print("Usage: python3 prm.py <modulo> <base>")

