package com.example.appmobilestartup;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class menu extends AppCompatActivity {

    ImageView imageViewClose;
    TextView textView23, textView15, textView10;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        imageViewClose = findViewById(R.id.imageViewClose);
        textView23 = findViewById(R.id.textView23);
        textView15 = findViewById(R.id.textView15);
        textView10 = findViewById(R.id.textView10);

        imageViewClose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(menu.this,home.class);
                startActivity(intent);
            }
        });

        textView10.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(menu.this,home.class);
                startActivity(intent);
            }
        });

        textView15.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(menu.this,meudados.class);
                startActivity(intent);
            }
        });

        textView23.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(menu.this, "Sessão Encerrada", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(menu.this,MainActivity.class);
                startActivity(intent);
            }
        });
    }
}