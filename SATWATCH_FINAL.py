#Salut ! Pour que la carte s'actualise toutes les deux secondes par exemple, il faut que vous appeliez la fonction positionTwoPoints toutes les 2s. Cela vous créé un fichier .txt avec [[latSatellite, longSatellite, hauteurSatellite],[latPoint1,longPoint1,hauteurPoint1=0],[latPoint2, longPoint2, hauteurPoint2=0]] 







from pyorbital.orbital import Orbital
from datetime import datetime
import numpy as np
import requests
import csv
# Use current TLEs from the internet:
orb = Orbital("Sentinel-1A")
now = datetime.utcnow()
# Get normalized position and velocity of the satellite:
#print(orb.get_position(now))

# Get longitude, latitude and altitude of the satellite:
lonlatalt=orb.get_lonlatalt(now)
#print(lonlatalt)


R=6378000
#Angles d'incidence en radian
i1=20*np.pi/180
i2=45*np.pi/180
resultat=[]

def positionTwoPoints():  #returns [[longSatellite,latSatellite],[longPoint1, latPoint1],[longPoint2,latPoint2]]
    #Appel TLE
    #Altitude satellite en m
    h=orb.get_lonlatalt(now)[2]*1000
    
    #Calcul de l'angle entre projection sat et 1er point fauche
    delta = 4*(R**2*(np.cos(i1))**2+h*(2*R+h))
    
    x=(-2*R*np.cos(i1)+np.sqrt(delta))/2
    
    alpha=np.arccos((2*R**2+2*R*h+h**2-x**2)/(2*R*(R+h)))
    
    
    
    #print(orb.get_lonlatalt(now)[1]-alpha*180/np.pi)
    
    
    
    delta = 4*(R**2*(np.cos(i2))**2+h*(2*R+h))
    
    x=(-2*R*np.cos(i2)+np.sqrt(delta))/2
    
    beta=np.arccos((2*R**2+2*R*h+h**2-x**2)/(2*R*(R+h)))
    
    #print(orb.get_lonlatalt(now)[1]-beta*180/np.pi)
    
    
    #print((beta*180/np.pi-alpha*180/np.pi)*np.pi*R/(2*90))

    sat = [orb.get_lonlatalt(now)[0],orb.get_lonlatalt(now)[1], orb.get_lonlatalt(now)[2]]
    point1 = [orb.get_lonlatalt(now)[0],orb.get_lonlatalt(now)[1]-alpha*180/np.pi,0]
    point2= [orb.get_lonlatalt(now)[0],orb.get_lonlatalt(now)[1]-beta*180/np.pi,0]
    
    # print(sat)
    # print(point1)
    # print(point2)
    
    np.savetxt('C:/Users/Florence/Desktop/results.txt',[sat, point1, point2],delimiter=' ',newline='\n')