import { useState } from 'react';
import { SafeAreaView, StyleSheet, Text, StatusBar, Button } from 'react-native';
import { Person } from './types/person';

export default function twoFourTeenApp() {
  
//States
  const [person, setPerson] = useState<Person>({
    name: '',
    age: 0,
    height: 0
  });

//Functions

  const changePerson = (newName: string, newAge: number, newHeight: number) =>{
    setPerson({
      ...person,
      name: newName,
      age: newAge,
      height : newHeight
    })
  }

// APP
  return (
    <SafeAreaView>

        <StatusBar barStyle="light-content" backgroundColor='#FFF' />

        <Text style={styles.title}>TwoFourTeenApp</Text>
        <Text style={styles.person}>Nome: {person.name}</Text>
        <Text style={styles.person}>Idade: {person.age}</Text>
        <Text style={styles.person}>Altura: {person.height}</Text>
        {person.weight && <Text style={styles.person}>Peso: {person.weight}kg</Text>}

        <Button title='Inserir Dados' onPress={() => changePerson('Neto',36,1.80)}/>
    
    </SafeAreaView>
  );

}

// CSS

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  title: {
    fontSize: 24,
    color : '#FF0000',
    textAlign : 'center'
  },
  subtitle: {
    fontSize : 19,
    color : '#000',
    textAlign : 'center',
    marginBottom: 50,
    marginTop: 50
  },
  person: {
    marginLeft: 10,
    marginRight: 10,
    fontSize : 19,
    color : '#000'
  }
});
