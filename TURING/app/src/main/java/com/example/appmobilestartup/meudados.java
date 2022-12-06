package com.example.appmobilestartup;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

public class meudados extends AppCompatActivity {

    ImageView imageViewMenu;
    Button button4;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_meudados);

        imageViewMenu = findViewById(R.id.imageViewMenu);
        button4 = findViewById(R.id.button4);

        imageViewMenu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(meudados.this,menu.class);
                startActivity(intent);
            }
        });

        button4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(meudados.this, "DADOS ALTERADOS COM SUCESSO!", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(meudados.this,home.class);
                startActivity(intent);
            }
        });
    }
}