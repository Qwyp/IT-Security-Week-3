import sys
import time
import pymysql
import os


class SqlCon:
    host = "localhost"
    username = "root"
    password = ""
    database = "project"
    connection = 0
    users = {
        0:{
            "username" : "test",
            "password" : "test"
        },
        1: {
            "username": "user",
            "password": "user"
        },
        2: {
            "username": "admin",
            "password": "admin"
        }
    }
    products ={
        0: {
            "product_name": "keyboard",
            "price": 10.20,
            "amount": 10
        },
        1: {
            "product_name": "Mouse",
            "price": 5.20,
            "amount": 15
        },
        2: {
            "product_name": "Headphone",
            "price": 30.60,
            "amount": 5
        },
        3: {
            "product_name": "External HDD 1TB",
            "price": 40.00,
            "amount": 50
        },
        4: {
            "product_name": "USB Stick 32GB",
            "price": 11.20,
            "amount": 20
        },
        5: {
            "product_name": "USB Stick 16GB",
            "price": 9.99,
            "amount": 30
        },
        6: {
            "product_name": "Wireless Mouse",
            "price": 50.30,
            "amount": 10
        },
        7: {
            "product_name": "LAN Cable 3m",
            "price": 10.20,
            "amount": 40
        }
    }

# Connect to MYSQL and check if the database is there. in case of no database it will create the DataBase
    def sql_connector(self):
        try:
            print("[*] Connecting to DataBase ...")
            print("=" * 80)
            self.connection = pymysql.connect(self.host, self.username, self.password, self.database)
            print("[*] All Done!  \nConnection to `project` DataBase has been successfully established...")
            print("=" * 80)
        except pymysql.err.DatabaseError:
            self.schema_creator()
            print("[*] Connecting to DataBase ...")
            print("=" * 80)
            self.connection = pymysql.connect(self.host, self.username, self.password, self.database)
            print("[*] All Done!  \nConnection to `project` DataBase has been successfully established...")
            print("=" * 80)
        return self.connection

# Creating DataBase

    def schema_creator(self):
        self.connection = pymysql.connect(self.host, self.username, self.password)
        cursor = self.connection.cursor()
        print("[*] Creating `project` DataBase")
        time.sleep(1)
        cursor.execute("CREATE DATABASE `" + self.database + "`")
        print("[*] Database `project` has been successfully created...")
        print("=" * 80)
        self.connection.close()
        print("[*] Connection has been closed...")
        print("=" * 80)

# Creating Tables in MYSQL
    def create_tables(self):
        self.connection = self.sql_connector()
        print("[*] Creating `users` Table...")
        time.sleep(1)
        try:
            with self.connection.cursor() as cursor:
                cursor.execute("CREATE TABLE `users` ("
                               "`ID` INT NULL AUTO_INCREMENT , "
                               "`username` TEXT NOT NULL , "
                               "`password` TEXT NOT NULL , "
                               "PRIMARY KEY (`ID`), "
                               "UNIQUE (`username`(255)))")
            self.connection.commit()
            print("[*] `users` Table has been successfully created...")
            print("=" * 80)
        except pymysql.err.InternalError as err:
            print("[!] " + err.args[1])
            print("=" * 80)
        print("[*] Creating `product` Table...")
        time.sleep(1)
        try:
            with self.connection.cursor() as cursor:
                cursor.execute("CREATE TABLE `products` ("
                               "`ID` INT NULL AUTO_INCREMENT , "
                               "`product_name` TEXT NOT NULL , "
                               "`price` FLOAT NOT NULL , "
                               "`amount` INT NOT NULL , "
                               "PRIMARY KEY (`ID`), "
                               "UNIQUE (`product_name`(255)))")
            self.connection.commit()
            print("[*] `product` Table has been successfully created...")
            print("=" * 80)
        except pymysql.err.InternalError as err:
            print("[!] " + err.args[1])
            print("=" * 80)
        self.connection.close()
        print("[*] Connection has been closed...")
        print("=" * 80)

# Insert Data to tables

    def data_insertion(self):
        self.connection = self.sql_connector()
        print("[*] Filling `users` Table...")
        print("=" * 80)
        time.sleep(1)
        for user in self.users.keys():
            try:
                with self.connection.cursor() as cursor:
                    cursor.execute("INSERT INTO `users` VALUES(NULL, '" + self.users[user]["username"]
                                   + "', MD5('" + self.users[user]["password"] + "'))")
                    print("[*] " + self.users[user]["username"], "has been successfully added...")
                self.connection.commit()
            except pymysql.err.IntegrityError as err:
                print("[!] " + err.args[1])
                print("=" * 80)
        print("[*] ALL DONE...")
        print("=" * 80)
        print("[*] Filling `products` Table...")
        print("=" * 80)
        time.sleep(1)
        for product in self.products.keys():
            try:
                with self.connection.cursor() as cursor:
                    cursor.execute("INSERT INTO `products` "
                                   "(`ID`, `product_name`, `price`, `amount`) "
                                   "VALUES (NULL, '"
                                   + self.products[product]["product_name"] + "', '"
                                   + str(self.products[product]["price"]) + "', '"
                                   + str(self.products[product]["amount"]) + "')")
                    print("[*] " + self.products[product]["product_name"], "has been successfully added...")
                self.connection.commit()
            except pymysql.err.IntegrityError as err:
                print("[!] " + err.args[1])
                print("=" * 80)
        print("[*] ALL DONE...")
        print("=" * 80)
        self.connection.close()
        print("[*] Connection has been closed...")
        print("=" * 80)


SqlConn = SqlCon()


SqlConn.create_tables()
time.sleep(1)
SqlConn.data_insertion()
time.sleep(1)


port = 9999
try:
    os.system("php -S localhost:" + str(port))
    print("Server is up and listening...")
    print("*" * 30)
    print("http://localhost:" + str(port))
    print("*" * 30)
    print("Press Ctrl+C to shutdown the SERVER and exit")
except KeyboardInterrupt:
    print("Server is shutting down...")
    time.sleep(2)
    sys.exit()


