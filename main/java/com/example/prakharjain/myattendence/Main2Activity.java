package com.example.prakharjain.myattendence;

import android.app.Activity;
import android.content.ContentValues;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;

import java.util.ArrayList;

public class Main2Activity extends SQLiteOpenHelper {
    int a;
    SQLiteDatabase db;
    public Main2Activity(Activity ct)
    {
        super(ct,"db",null,1);

    }
    @Override
    public void onCreate(SQLiteDatabase db) {

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }

    public void addAttendence(Activity ctt,String s1)
    {
try {
    db = super.getWritableDatabase();


    ContentValues values = new ContentValues();
    values.put("name", s1);
    values.put("countA", 1);
    db.insert("Dbvvtp", null, values);
    Toast.makeText(ctt, "Attendence list prepared", Toast.LENGTH_LONG).show();

}
    catch(Exception e)
    {

    }}
    public void ew()
    {
        db = super.getWritableDatabase();
        String query = "create table Dbvvtp (name text,countA integer)";
        db.execSQL(query);
    }
  public void addList(Activity ct,String s1)
  {try {
      ContentValues values = new ContentValues();
      SQLiteDatabase db =this.getReadableDatabase();
      SQLiteDatabase dd =this.getWritableDatabase();
Cursor cr=db.rawQuery("select * from Dbvvtp where name = ?",new String[]{s1});
while(cr.moveToNext())
{
 a=cr.getInt(1);
    a++;
    values.put("countA",a);
    dd.update("Dbvvtp",values,"name=?", new String[]{s1});
}
      Toast.makeText(ct,"Attendence added",Toast.LENGTH_LONG).show();
  }
  catch(Exception e)
  {
      Toast.makeText(ct,e.toString(),Toast.LENGTH_LONG).show();
  }
  }
    public ArrayList show(Activity ct)
    {
        ArrayList <String> ast=new ArrayList();
        try {

            ContentValues values = new ContentValues();
            SQLiteDatabase db =this.getReadableDatabase();
            Cursor cr=db.rawQuery("select * from Dbvvtp",null);
            while(cr.moveToNext())
            {
                ast.add(cr.getString(0)+"   "+cr.getInt(1));
            }
            Toast.makeText(ct,"Attendence added",Toast.LENGTH_LONG).show();

        }
        catch(Exception e)
        {
            Toast.makeText(ct,e.toString(),Toast.LENGTH_LONG).show();
        }
        return ast;
    }
    public void del(Activity ct)
    {
        try {
            SQLiteDatabase db = super.getWritableDatabase();
            db.delete("Dbvvtp",null,null);
        }
        catch(Exception e)
        {
            Toast.makeText(ct,e.toString(),Toast.LENGTH_LONG).show();
        }
        Toast.makeText(ct,"deleted",Toast.LENGTH_LONG).show();
    }
}

