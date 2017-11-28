package com.example.prakharjain.myattendence;

import android.app.Activity;
import android.bluetooth.BluetoothAdapter;
import android.bluetooth.BluetoothDevice;
import android.content.Intent;
import android.content.IntentFilter;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import java.lang.reflect.Method;
import java.util.ArrayList;
import java.util.Set;

public class MainActivity extends Activity  {
    Button b1,b2,b3,b4,b5;
    private BluetoothAdapter BA;
    private Set<BluetoothDevice>pairedDevices;
    ListView lv;
    IntentFilter filter;
    ArrayList list;
    private Intent turnOn;
    Main2Activity at;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        list = new ArrayList();
        at = new Main2Activity(this);
        b1 = (Button) findViewById(R.id.button);
        b2=(Button)findViewById(R.id.button2);
        b3=(Button)findViewById(R.id.button3);
        b4=(Button)findViewById(R.id.button4);
        BA = BluetoothAdapter.getDefaultAdapter();
        lv = (ListView)findViewById(R.id.ListView);
        if (!BA.isEnabled()) {
            turnOn = new Intent(BluetoothAdapter.ACTION_REQUEST_ENABLE);
            startActivityForResult(turnOn, 0);
            Toast.makeText(getApplicationContext(), "Turned on",Toast.LENGTH_LONG).show();

        } else {
            Toast.makeText(getApplicationContext(), "Already on", Toast.LENGTH_LONG).show();
        }
        Intent getVisible = new Intent(BluetoothAdapter.ACTION_REQUEST_DISCOVERABLE);
        startActivityForResult(getVisible, 0);
        BA.startDiscovery();
    }
    public void off(View v) {
        try {

            at.ew();
        }
        catch(Exception e){Toast.makeText(getApplicationContext(),e.toString(), Toast.LENGTH_SHORT).show();}
    }


    public void list(View v) {

        try {
            pairedDevices = BA.getBondedDevices();



            for (BluetoothDevice bt : pairedDevices) {
                list.add(bt.getName());
                at.addAttendence(this, bt.getName());
            }
            Toast.makeText(getApplicationContext(), "Showing added name in Attendence", Toast.LENGTH_SHORT).show();

            final ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1, list);

            lv.setAdapter(adapter);
        } catch (Exception e) {
            Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
        }
    }
    public void add(View v)
    {
        try{
            pairedDevices = BA.getBondedDevices();

            Main2Activity at=new Main2Activity(this);

            for (BluetoothDevice bt : pairedDevices) {
                at.addList(this, bt.getName());
            }
        }
        catch(Exception e)
        {
            Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
        }
    }

    public void depair(View v) {
        try {
            if (pairedDevices.size() > 0) {
                for (BluetoothDevice device : pairedDevices) {
                    try {
                        Method m = device.getClass()
                                .getMethod("removeBond", (Class[]) null);
                        m.invoke(device, (Object[]) null);
                    } catch (Exception e) {
                        Log.e("fail", e.getMessage());
                    }
                }
            }
        }
        catch(Exception e){}
    }
    public void see(View v)
    {
       Intent i=new Intent(this,Main4Activity.class);
        startActivity(i);
    }
public void delete(View v)
{
    Main2Activity at=new Main2Activity(this);
    at.del(this);
}

}