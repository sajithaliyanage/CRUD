#Created by : Sajitha Liyanage
#Registration Number : 2014/CS/078
#Assignment Number : 3 
#Compatibility : Python 2.7

#Creating aQueue
class Queue:
    def __init__(self):
        self.items = []

    def __str__(self):
        return str(self.items)

    def isEmpty(self):
        return self.items == []

    def enqueue(self, item):
        self.items.append(item)

    def dequeue(self):
        return self.items.pop(0)

    def size(self):
        return len(self.items)

#creating a Queue Object
waiting = Queue()
#creating a array for input Cars
garage = []
#Creating a list for calculate move_Counts
numOfmoves= []

#GUI Enter button comand
def full():
    carpark()
    ClearEntry()

#GUI print function intext box
def Print(text,line):
    text.insert(INSERT,line,END,'\n')

#main Function
def carpark():
    #get user inputs by 3 entrys
    cars1 = entry1.get()
    cars2 = entry2.get()
    cars3 = entry3.get()
    #make a list to keep together all entrys
    abc = [cars1,cars2,cars3]

    #loop for above list to do this fuction
    for item in abc:
        #identify user input arrival or depart
        command = item.split(" ")[0]
        #identify Car Number plate
        plateNumber = " ".join(item.split(' ' )[1:])

        #continue loop
        if item =='':
            continue

        # if command equal to arriaval
        elif command == "a":
            #Serach is it in garage
            if plateNumber in garage:
                Print(text1,"-"*60)
                Print(text1,"Car already in the Garage")
                Print(text1,"-"*60)

            #elif car in the waiting list
            elif plateNumber in waiting.items:
                Print(text1,"-"*60)
                Print(text1,"Car already in the Garage")
                Print(text1,"-"*60)

            #without above things till garage length 10
            elif len(garage)<9:
                garage.append(plateNumber)
                numOfmoves.append(1)
                Print(text1,"-"*60)
                Print(text1, str(len(garage))+" Car ARRIVED. Car number "+plateNumber+". There is SPACE at Garage")
                Print(text1,"-"*60)
            #garage equal to length 10
            elif len(garage)==9:
                garage.append(plateNumber)
                numOfmoves.append(1)
                Print(text1,"-"*60)
                Print(text1,str(len(garage))+" Car ARRIVED. Car number "+plateNumber+" . There is NO SPACE at Garage")
                Print(text1,"-"*60)
            #garage equal to more than 10
            elif len(garage)>9:
                #car add to waiting list
                waiting.enqueue(plateNumber)
                Print(text1, "-"*60)
                Print(text1, plateNumber+" Car MOVED to Waiting list.There is "+str(waiting.size())+" Cars in Waiting list")
                Print(text1, "-"*60)
        # if command equal to departe       
        elif command =="d":
            #search car is in garage and depart
            if plateNumber in garage:
                ind=garage.index(plateNumber)
                Print(text1, "-"*60)
                Print(text1,garage.pop(ind)+" DEPARTED from Garage. It has MOVED "+str(numOfmoves.pop(ind))+" Times")
                for c in range(len(numOfmoves)):
                    #increase moveCount list by 1
                    numOfmoves[c] +=1
                #is there any car in waiting list it add to garage
                if not waiting.isEmpty():
                    waiting_first =waiting.dequeue()
                    garage.append(waiting_first)
                    Print(text1,waiting_first+" MOVED to Garage. There is "+str(waiting.size())+" Cars in Waiting list" )                   
                Print(text1, "-"*60)
              #search car is in waiting list and depart it  
            elif plateNumber in waiting.items:
                #deque all cars and select depart car
                 for i in range(0,len(waiting.items)):
                    new2 = waiting.dequeue()
                    if new2 != plateNumber:
                        #other cars again enqueue
                        waiting.enqueue(new2)
                 Print(text1,"-"*60)
                 Print(text1,str(plateNumber)+" DEPARTED from waiting list. It has moved 0 times")
                 Print(text1, "-"*60)
                 
             #Error message for invalid inputs   
            else:
                Print(text1, "-"*60)
                Print(text1,"There is NO like that Car in the Garage")
                Print(text1,"-"*60)
        #Error message for invalid inputs      
        else:
            Print(text1, "-"*60)
            Print(text1,"Invalid Input. Read Instructions.")
            Print(text1, "-"*60)
            
    #Error message for invalid inputs          
    if cars1=='' and cars2==''and cars3=='':
        tkMessageBox.showinfo("Error!", "Car Number NOT Found!")

#import Tkinter for crate GUI        
from Tkinter import *
#import Message box for errors! 
import tkMessageBox

#Button Commands
def Clear():
    text1.delete(0.0,END)

def Reset():
    del waiting.items[:]
    del garage[:]
    del numOfmoves[:]

def ResetNClear():
    Clear()
    Reset()
    
def ClearEntry():
    entry1.delete(0,END)
    entry2.delete(0,END)
    entry3.delete(0,END)
    
def close_window (): 
    root.destroy()       

#Create frame
root = Tk()
#Create frame with Widgets
root.title("Laughs Parking Garage")
root.geometry("620x600")
root.configure(background='#e3e3e3')
app = Frame(root)
app.grid()

label2 = Label (app, text ="Enter - 'a xx xxxx' or 'd xx xxxx'")
label3 = Label (app, text ="Instructions - 'a - ARRIVAL' /  'd - DEPARTE'")
label = Label (app, text ="Enter Your Car Number (a/d XX XXXX) :")
label3.grid()
label2.grid()
label.grid()

#input Fields
entry1 = Entry()
entry1.grid(columnspan = 2)
#input Fields
entry2 = Entry()
entry2.grid(columnspan = 2)
#input Fields
entry3 = Entry()
entry3.grid(columnspan = 2)

#button for enter
button1 = Button(text = "Enter", command=full, width=15, height=2, bg="green")
button1.grid(row = 1,column = 3)
#button for reset
button2 = Button(text = "Reset", command=ResetNClear, width=15, height=2,bg="orange")
button2.grid(row = 2,column = 3)
#button for exite
button3 = Button(text = "Exite", command=close_window, width=15, height=2,bg="red")
button3.grid(row = 3,column = 3)

#create a scrollbar for the listbox
scrollbar = Scrollbar(root,elementborderwidth=3)
scrollbar.grid(row = 5,column = 1,sticky='ns')
#create a text box for showing results
text1 = Text(width = 60 , height=25,yscrollcommand = scrollbar.set)
text1.grid(row=5)
scrollbar.config(command = text1.yview )
#call the root 
root.mainloop()
