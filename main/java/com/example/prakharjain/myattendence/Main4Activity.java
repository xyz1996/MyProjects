package com.example.prakharjain.myattendence;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class Main4Activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main4);
        Main2Activity at=new Main2Activity(this);
        ListView lvv= (ListView)findViewById(R.id.lvv);
        ArrayAdapter addt=new ArrayAdapter(this,android.R.layout.simple_list_item_1,at.show(this));
        lvv.setAdapter(addt);
    }

}
