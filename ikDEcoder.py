from datetime import date


def ikInfo(ik):
    #digits='0123456789'
    res={}
    #check data
    if len(ik)==0:
        res['error']='no data '
        return res
    #check the size
    elif len(ik)!=11:
        res['error']='wrong size '
        return res
    #check if numbers
    else:
        #for ikDig in ik:
            if not ik.isnumeric(): # ikDig !=digits[0] and ikDig !=digits[1] and ikDig !=digits[2] and ikDig !=digits[3] and
            #ikDig !=digits[4] and ikDig !=digits[5] and ikDig !=digits[6] and ikDig !=digits[7] and digits[8] and ikDig !=digits[9]:
                res['error']+='NUMDERS MOTHER FUCKER'
                return res       
    #check if data is good ydm
    gender =int(ik[0])
    if gender <1 or gender>6:
        res['error']='YOUR GENDER YOU SNOWFLAKE '
        return res
    #gender
    curDate = date.today()#yyyy-mm-dd
    cY=int(str(curDate)[2:4])
    cBY=int(str(curDate)[0:4])
    cM=int(str(curDate)[5:7])
    cD=int(str(curDate)[8:10])
    yOB = int(ik[1:3])
    if (gender == 5 or gender == 6) and yOB>cY:
        res['error']='year is baaaaad'
        return res
    #Yob
    mOB= int(ik[3:5])
    if mOB==0 or mOB > 12:
        res['error']='month is baaaaad'
        return res
    #mob
    days=[31,28,31,30,31,30,31,31,30,31,30,31]
    if gender == 5 or gender == 6:
        yOB= 2000+yOB
    elif gender == 4 or gender == 3:
        yOB=1900+yOB
    else:
        year= 1800+yOB
    leapYear=0
    if yOB%4==0:
        days[1]=29

    dOB= int(ik[5:7])
    if dOB>days[mOB-1]:
        res['error']='day is baaaaad'
        return res 
    #dob
    if gender%2==1:
        res['gender']='Male'
    else:
        res['gender']='Female'
    res['year']=yOB
    
    mNames=('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec')
    res['month']=mNames[mOB-1]
    res['mob']=mOB
    res['day']=dOB
    yearsOld = cBY-yOB-1
    if mOB<cM:
        age=yearsOld+1
    elif mOB==cM and dOB<=cD:
        age=yearsOld+1
    else:
        age=yearsOld
    #how old
    res['age']=age
    #return all that data
    return res

h=ikInfo(sys.argv[1])
print(h['age'])


