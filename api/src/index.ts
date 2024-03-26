import Fastify from 'fastify'
import fastifyStatic from '@fastify/static'
import path from 'path'
import fs from 'fs'

const EXHIBITIONS_PATH = path.join(__dirname, 'resources', 'exhibitions')

const server = Fastify({
    logger: true
})

server.register(fastifyStatic, {
    root: path.join(__dirname, 'resources'),
})


// DEBUG
server.get('/ping', async (request, reply) => {
    return 'pong\n'
})

server.get('/test', async (request, reply) => {
    reply
    .code(200)
    .header('Content-Type', 'application/json; charset=utf-8')
    .send({ hello: 'world' })
})
// DEBUG

server.get('/exhibitions', async (request, reply) => {
    try {
        const files = fs.promises.readdir(EXHIBITIONS_PATH)
        reply.send(files)
    } catch (error) {
        reply.code(500).send(error)
    }
})

// IN PRODUCTION CHANGE TO 127.0.0.1
const start = async () => {
    try {
        const address = await server.listen({ host: '0.0.0.0', port: 3338 })
        server.log.info(`Server listening on ${address}`)
    } catch (err) {
        server.log.error(err)
        process.exit(1)
    }
}
start()