package com.example.appmobilestartup;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class cadastro extends AppCompatActivity {

    Button button3;

    TextView textViewLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cadastro);

        button3 = findViewById(R.id.button3);
        textViewLogin = findViewById(R.id.textViewLogin);

        button3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(cadastro.this,MainActivity.class);
                startActivity(intent);
                Toast.makeText(cadastro.this, "Cadastrado com sucesso!", Toast.LENGTH_SHORT).show();
            }
        });

        textViewLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(cadastro.this,MainActivity.class);
                startActivity(intent);
            }
        });
    }
}