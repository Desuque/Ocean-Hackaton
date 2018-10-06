from pyorbital.orbital import Orbital
from datetime import datetime
import numpy as np
# Use current TLEs from the internet:
orb = Orbital("Sentinel-1A")
now = datetime.utcnow()
# Get normalized position and velocity of the satellite:
#print(orb.get_position(now))

# Get longitude, latitude and altitude of the satellite:
print(orb.get_lonlatalt(now))


R=6378000
#Angles d'incidence en radian
i1=20*np.pi/180
i2=45*np.pi/180

#Appel TLE
#Altitude satellite en m
h=orb.get_lonlatalt(now)[2]*1000

#Calcul de l'angle entre projection sat et 1er point fauche
delta = 4*(R**2*(np.cos(i1))**2+h*(2*R+h))

x=(-2*R*np.cos(i1)+np.sqrt(delta))/2

alpha=np.arccos((2*R**2+2*R*h+h**2-x**2)/(2*R*(R+h)))



print(orb.get_lonlatalt(now)[1]-alpha*180/np.pi)



delta = 4*(R**2*(np.cos(i2))**2+h*(2*R+h))

x=(-2*R*np.cos(i2)+np.sqrt(delta))/2

beta=np.arccos((2*R**2+2*R*h+h**2-x**2)/(2*R*(R+h)))

print(orb.get_lonlatalt(now)[1]-beta*180/np.pi)


print((beta*180/np.pi-alpha*180/np.pi)*np.pi*R/(2*90))