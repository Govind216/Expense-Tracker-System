#!/bin/python3

import math
import os
import random
import re
import sys



#
# Complete the 'maxCoins' function below.
#
# The function is expected to return an INTEGER.
# The function accepts INTEGER_ARRAY PiggyBankList as parameter.
#

def maxCoins(PiggyBankList):
    if (len(PiggyBankList)==1):
        return 1*PiggyBankList[0]*1
    if (len(PiggyBankList)==2):
        i = PiggyBankList.index(min(PiggyBankList))
        print(i)
        if i==0:
            return (1*PiggyBankList[i]*PiggyBankList[i+1]) + maxCoins(PiggyBankList.remove(PiggyBankList[i]))
        elif i==-1:
            return PiggyBankList[i-1]*PiggyBankList[i]*1 + maxCoins(PiggyBankList.remove(PiggyBankList[i]))
        
    for i in range(len(PiggyBankList)):
        if i!=0 and i!=-1 and i==min(PiggyBankList):
            return PiggyBankList[i-1]*PiggyBankList[i]*PiggyBankList[i+1] + maxCoins(PiggyBankList.remove(PiggyBankList[i]))
    for i in range(len(PiggyBankList)):
        if i!=0 and i!=-1:
            return PiggyBankList[i-1]*PiggyBankList[i]*PiggyBankList[i+1] + maxCoins(PiggyBankList.remove(PiggyBankList[i]))
    
    
    

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    PiggyBankList_count = int(input().strip())

    PiggyBankList = []

    for a in range(PiggyBankList_count):
        PiggyBankList_item = int(input().strip())
        PiggyBankList.append(PiggyBankList_item)

    result = maxCoins(PiggyBankList)

    fptr.write(str(result) + '\n')

    fptr.close()
